    require 'net/smtp'
	require 'tmail'
	require 'mysql'
	def send_mail (from, to, subject, content)
		mail = TMail::Mail.new
		mail.to = to
		mail.from = "=?UTF-8?B?56aP5biD5pav5Lit5paH572R?= <" + from.to_s + ">"
		mail.subject = subject
		mail.date = Time.now
		mail.mime_version = '1.0'
		mail.set_content_type 'text', 'html', {'charset'=>'utf-8'}
		mail.body = content
		str = mail.encoded
		begin
			Net::SMTP.start('smtp.qiye.163.com', 25,'abc<userservice@forbeschina.com>','userservice@forbeschina.com','userservice',:login) do |smtp|
      			result = smtp.send_message str,'userservice@forbeschina.com',to
				#print_r(result)
				return result.status == "250"
    		end
		rescue Net::SMTPAuthenticationError
			return false
		else
			return false
		end
	end
	host = '192.168.1.4'
	user = 'forbes_db'
	#host = 'localhost'
	#user = 'root'
	my = Mysql.connect(host, user,'xunao','forbes_email')
	randnum = rand(100000).to_s
	stmt = my.prepare("update forbes_email.fb_email set email_status=? where email_status=0")
	stmt.execute randnum
	
	items = my.query("select * from forbes_email.fb_email where email_status=#{randnum}")
	items.each do |id,to,from,subject,content,status|
		if send_mail(from,to,subject,content)
			stmt = my.prepare("delete from forbes_email.fb_email where id=?")
		else
			stmt = my.prepare("update forbes_email.fb_email set email_status = 0 where id=?")
		end
		stmt.execute id
	end
#	p send_mail('userservice@forbeschina.com','sauger1@163.com','测试','测试内容')
