require 'net/http'
require 'uri'
require 'mysql'

dbhost = '192.168.1.4'
dbuser = 'forbes_db'
#dbhost = 'localhost'
#dbuser = 'root'
dbpassword = 'xunao'
dbname = 'forbes'
my = Mysql.connect(dbhost, dbuser, dbpassword ,dbname)
file = File.new(File.dirname(__FILE__) +'/update_stock',"w+")
interval = 200
i = 0
while true do 
	start = i*interval
	puts "handle #{i}"
	sql = "select id, stock_code,stock_place_code from fb_company where date(stock_update_time) != date(now()) or stock_update_time is null order by stock_place_code desc limit #{start},#{interval}"
	items = my.query(sql)
	codes = []
	ids = []
	items.each do |id,ssdm,jys|
		code = ssdm
		code = code + '.' + jys if jys.length > 0 
		codes.push code
		ids.push id
	end

	code = codes.join(',')
	url = "http://download.finance.yahoo.com/d/quotes.csv?s=#{code}&f=sl1&e=.csv"
	url_str = url
	url = URI.parse(url);
	fail_count = 0
	while true do
		begin
			res = Net::HTTP.get(url)
			get_result = true
			break
		rescue
			fail_count = fail_count + 1
			sleep(fail_count + 1)
			puts url if fail_count == 1
			puts 'erro' + fail_count.to_s
			if fail_count > 10
				get_result = false
				break
			end
		end
	end

	#获得股价成功
	if get_result
		j=0
		res.split("\n").each do |lines|
		
			lines.each do |line|
				value = line.split(',')[1]
				if value.nil?
				else
					sql = "update fb_company set stock_value=#{value},stock_update_time = now() where id=#{ids[j]};"
					file.puts sql
				end
			end
			j = j+1
		end
	else #获得股价失败

	end
	i = i+1
		if items.num_rows < interval
		break
	end 
	items.free
	sleep(2)
end
file.close
puts 'start to update'
system "mysql -h#{dbhost} -u#{dbuser} -p#{dbpassword} #{dbname} < /website/forbes/admin/plugin/update_stock"
puts 'update finish'

#require File.dirname(__FILE__) +"/updatedb.rb"
