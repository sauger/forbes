// JScript 文件

function bodonload()
    {
         document.getElementById("txt1").focus();         
    }
    
    function CheckTime(obj,str)
    {    
    }
    
    function CheckIsEmpty(obj)
    {
        if(obj.value=="")
        {
            return true;
        }
    }
    
    function CheckName(obj)
    {
        var id=obj.id;
        if(CheckIsEmpty(obj)||obj.value==" ")
        {
          //  alert("姓名不能为空！");
            document.getElementById(id+"lab").innerHTML="姓名不能为空！";
            obj.focus();
            return false;
        }
        else
        {
        document.getElementById(id+"lab").innerHTML="";
        }
    }
    function CheckAge(obj)
    {  var id=obj.id;
        if(CheckIsEmpty(obj))
        {
            //alert("年龄不能为空！");
            document.getElementById(id+"lab").innerHTML="年龄不能为空！";//obj.focus();
            return false;
        }
       else if(isNaN(obj.value))
        {
           // alert("必须为数字！");
           document.getElementById(id+"lab").innerHTML="必须为数字！";//obj.focus();
            return false;
        }
        else if(obj.value<5 || obj.value>80)
        {
            //alert("年龄在5-80之间");
            document.getElementById(id+"lab").innerHTML="年龄在5-80之间！";//obj.focus();
        }
        else
        {
        document.getElementById(id+"lab").innerHTML="";
        }
    }
    
    function CheckGZDW(obj)
    {
        var id=obj.id;
        if(CheckIsEmpty(obj))
        {
            //alert("工作单位不能为空！");
            document.getElementById(id+"lab").innerHTML="工作单位不能为空！";//obj.focus();
            return false;
        }
        else
        {
        document.getElementById(id+"lab").innerHTML="";
        }
    }
    
    var value="";
    function CheckGZNX(obj)
    {
    var id=obj.id;
    value=obj.value;
        if(CheckIsEmpty(obj))
        {
            //alert("工作年限不能为空！");
            document.getElementById(id+"lab").innerHTML="工作年限不能为空！";//obj.focus();
            return false;
        }
       else if(isNaN(obj.value))
        {
            //alert("工作年限必须为数字！");
            document.getElementById(id+"lab").innerHTML="工作年限必须为数字！";//obj.focus();
            return false;
        }
        else if(obj.value<0 || obj.value>60)
        {
            //alert("工作年限在5-80之间");
            document.getElementById(id+"lab").innerHTML="工作年限在0-60之间！";//obj.focus();
        }
        else
        {
        document.getElementById(id+"lab").innerHTML="";
        }
    }
    
    function CheckLCNY(obj)
    {
    var id=obj.id;
         if(CheckIsEmpty(obj))
        {
            //alert("理财工作年限不能为空！");
            document.getElementById(id+"lab").innerHTML="理财工作年限不能为空！";//obj.focus();
            return false;
        }
       else if(isNaN(obj.value))
        {
           // alert("理财工作年限必须为数字！");
           document.getElementById(id+"lab").innerHTML="理财工作年限必须为数字！";//obj.focus();
            return false;
        }
        else if(obj.value<0 || obj.value>60)
        {
            //alert("理财工作年限在5-80之间");
            document.getElementById(id+"lab").innerHTML="理财工作年限在0-60之间！";//obj.focus();
        }
        else if(obj.value>value)
        {
            document.getElementById(id+"lab").innerHTML="理财工作年限必须小于等于工作年限！";
        }
        else
        {
        document.getElementById(id+"lab").innerHTML="";
        }
    }
     
    function HighBYYX(obj)
    {
    var id=obj.id;
         if(CheckIsEmpty(obj))
        {
           // alert("最高学历毕业不能为空！");
           document.getElementById(id+"lab").innerHTML="最高学历毕业不能为空！";//obj.focus();
            return false;
        }
        else
        {
        document.getElementById(id+"lab").innerHTML="";
        }
    }
    
    function HighBYZY(obj)
    {
    var id=obj.id;
         if(CheckIsEmpty(obj))
        {
            //alert("专业不能为空！");
            document.getElementById(id+"lab").innerHTML="专业不能为空！";//obj.focus();
            return false;
        }
        else
        {
        document.getElementById(id+"lab").innerHTML="";
        }
    }
    
    function BKBYYX(obj)
    {
    var id=obj.id;
         if(CheckIsEmpty(obj))
        {
            //alert("本科院校不能为空！");
            document.getElementById(id+"lab").innerHTML="本科院校不能为空！";//obj.focus();
            return false;
        }
        else
        {
        document.getElementById(id+"lab").innerHTML="";
        }
    }
    
      function BKBYZY(obj)
    {
    var id=obj.id;
         if(CheckIsEmpty(obj))
        {
            //alert("本科专业不能为空！");
            document.getElementById(id+"lab").innerHTML="本科专业不能为空！";//obj.focus();
            return false;
        }
        else
        {
        document.getElementById(id+"lab").innerHTML="";
        }
    }
    
      function WHCRM(obj)
    {
    var id=obj.id;
         if(CheckIsEmpty(obj))
        {
            //alert("维护客户关系方式能为空！");
            document.getElementById(id+"lab").innerHTML="开发和维护客户关系方式不能为空！";//obj.focus();
            return false;
        }
        else
        {
        document.getElementById(id+"lab").innerHTML="";
        }
    }
    
    function Checkzm(obj,str)
    {
         var id=obj.id;
          if(CheckIsEmpty(obj))
        {
            //alert(str+" "+"不能为空！");
            document.getElementById(id+"lab").innerHTML=str+"不能为空！";//obj.focus();
            return false;
        }
        else
        {
            document.getElementById(id+"lab").innerHTML="";
        }
    }   
    function Check21(obj,str)
    {
    var id=obj.id;
    if(id=="txt18")
    {
         if(CheckIsEmpty(obj))
        {
            //alert(str+" "+"不能为空！");
            document.getElementById(id+"lab").innerHTML=str+"不能为空！";//obj.focus();
            return false;
        }
       else if(isNaN(obj.value))
        {
            //alert(str+" "+"必须为数字！");
            document.getElementById(id+"lab").innerHTML=str+"必须为数字！";//obj.focus();
            return false;
        }
        else if(obj.value<1 || obj.value>100)
        {
            //alert(str+" "+"必须是0的数！");
            document.getElementById(id+"lab").innerHTML=str+"必须是1-100之间的数字！";//obj.focus();
        }
        else
        {
        document.getElementById(id+"lab").innerHTML="";
        }
        }else
        {
             if(CheckIsEmpty(obj))
        {
            //alert(str+" "+"不能为空！");
            document.getElementById(id+"lab").innerHTML=str+"不能为空！";//obj.focus();
            return false;
        }
       else if(isNaN(obj.value))
        {
            //alert(str+" "+"必须为数字！");
            document.getElementById(id+"lab").innerHTML=str+"必须为数字！";//obj.focus();
            return false;
        }
//        else if(obj.value<1 || obj.value>100)
//        {
//            //alert(str+" "+"必须是0的数！");
//            document.getElementById(id+"lab").innerHTML=str+"必须是1-100之间的数字！";//obj.focus();
//        }
        else
        {
        document.getElementById(id+"lab").innerHTML="";
        }
        }
    }
    
     function Check2007(obj,str)
    {
    var id=obj.id;
         if(CheckIsEmpty(obj))
        {
            //alert(str+" "+"不能为空！");
            document.getElementById(id+"lab").innerHTML=str+"不能为空！";//obj.focus();
            return false;
        }
       else if(isNaN(obj.value))
        {
            //alert(str+" "+"必须为数字！");
            document.getElementById(id+"lab").innerHTML=str+"必须为数字！";//obj.focus();
            return false;
        }
        else
        {
        document.getElementById(id+"lab").innerHTML="";
        }
    }
    
    function Check20(obj,str)
    {
    var id=obj.id;
    if(id=="txt18")
    {
         if(CheckIsEmpty(obj))
        {
            //alert(str+" "+"不能为空！");
            document.getElementById(id+"lab").innerHTML="";//obj.focus();
            return false;
        }
       else if(isNaN(obj.value))
        {
            //alert(str+" "+"必须为数字！");
            document.getElementById(id+"lab").innerHTML=str+"必须为数字！";//obj.focus();
            return false;
        }
        else if(obj.value<1 || obj.value>100)
        {
            //alert(str+" "+"必须是0的数！");
            document.getElementById(id+"lab").innerHTML=str+"必须是1-100之间的数字！";//obj.focus();
        }
        else
        {
        document.getElementById(id+"lab").innerHTML="";
        }
    }
    else
        {
             if(CheckIsEmpty(obj))
            {
                //alert(str+" "+"不能为空！");
                document.getElementById(id+"lab").innerHTML="";//obj.focus();
                return false;
            }
           else if(isNaN(obj.value))
            {
                //alert(str+" "+"必须为数字！");
                document.getElementById(id+"lab").innerHTML=str+"必须为数字！";//obj.focus();
                return false;
            }
//        else if(obj.value<1 || obj.value>100)
//        {
//            //alert(str+" "+"必须是0的数！");
//            document.getElementById(id+"lab").innerHTML=str+"必须是1-100之间的数字！";//obj.focus();
//        }
            else
            {
            document.getElementById(id+"lab").innerHTML="";
            }
        }
    }
    //验证手机号码
    function Checkphon(object)
    {
            var s =object.value;
            var reg0 = /^13\d{5,9}$/;
            var reg1 = /^153\d{4,8}$/;
            var reg2 = /^159\d{4,8}$/;
            var reg4 = /^158\d{4,8}$/;
            var reg5 = /^189\d{4,8}$/;
            var reg3 = /^0\d{10,11}$/;
            var reg6 = /^150\d{4,8}$/;
            var my = false;
            var i=object.id;
            if (reg0.test(s))my=true;
            if (reg1.test(s))my=true;
            if (reg2.test(s))my=true;
            if (reg4.test(s))my=true;
            if (reg5.test(s))my=true;
            if (reg3.test(s))my=true;
            if(reg6.test(s))my=true;
            if(s!=""){
                if (!my)  {
                        document.getElementById(i+"lab").innerHTML="请输入正确的手机号码";
                       object.value="";
                       object.focus();
                       }else
                    {
                         document.getElementById(i+"lab").innerHTML="";
                    }
                }
                else
                {
                    document.getElementById(i+"lab").innerHTML="手机号码不能为空";
                }
    }
    //验证邮箱
    function CheckEmail(object)
     {
             var s =document.getElementById(object.id).value; 
             var pattern =/^[a-zA-Z0-9_\-]{1,}@[a-zA-Z0-9_\-]{1,}\.[a-zA-Z0-9_\-.]{1,}$/;
             var id=object.id;
             if(s!="")  
             {
              if(!pattern.exec(s))
                  {
                      document.getElementById(id+"lab").innerHTML="请输入正确的邮箱地址";
                      object.value="";
                      object.focus();
                  }
                 else
                 {
                    document.getElementById(id+"lab").innerHTML="";
                 }
             }
           }
    function CheckXL(obj)
    {
        alert(obj.childNode.count);
    }
    
    function CheckOther(obj,id1,id2,val)
    {
        if(obj.checked==true && val=="0")
        {
            document.getElementById(id1).style.display='block';
            //id2.focus();
            obj.focus();
        }
        else
        {  
            document.getElementById(id1).style.display='none';
        }
       
    }

   
    function check()
    {
        //姓名
        var inputName=document.getElementById("txt1"); 
        if(CheckName(inputName)==false)
        {
            alert("姓名不能为空！");
            inputName.focus();
            return false;
        }
        //年龄
        var inputAge=document.getElementById("txt3");
            
        if(CheckIsEmpty(inputAge))
        {
            alert("年龄不能为空！");
            inputAge.focus();
            return false;
        }
         
         //邮件
         var inputEmail = document.getElementById("txt9");
         
         if(CheckIsEmpty(inputEmail))
         {
            alert("Email不能为空！");
            inputEmail.focus();
            return false;
         }
         
         //手机号码
         var inputPhone = document.getElementById("txt10");
         
         if(CheckIsEmpty(inputPhone))
         {
            alert("手机号码不能为空！");
            inputPhone.focus();
            return false;
         }
         //最高学历
         
         var inputZGXL = document.getElementById("ddl12")
         if(CheckIsEmpty(inputZGXL))
         {
            alert("手机号码不能为空！");
            inputZGXL.focus();
            return false;
         }
         
         //最高学历院校
//         var inputZGXLYX = document.getElementById("txt13")
//         if(CheckIsEmpty(inputZGXLYX))
//         {
//            alert("最高学历毕业院校不能为空！");
//            inputZGXLYX.focus();
//            return false;
//         }
//         //最高学历所学专业
//         var inputZGXLZY = document.getElementById("txt16")
//         if(CheckIsEmpty(inputZGXLZY))
//         {
//            alert("最高学历所学专业不能为空！");
//            inputZGXLZY.focus();
//            return false;
//         }       
         //获得的资格认证zgtext
         var chkchk21_13 = document.getElementById("chk21_13");
         if(chkchk21_13.checked)
         {
            var inputzgtext = document.getElementById("zgtext");
            if(inputzgtext.value=="")
            {
                alert("获得的资格认证的其他选项被选中，文本框内容必填！");
                inputzgtext.focus();
                return false;
            }
         }
         
         //工作单位
         var inputGZDW = document.getElementById("txt5")
         if(CheckIsEmpty(inputGZDW))
         {
            alert("工作单位不能为空！");
            inputGZDW.focus();
            return false;
         }
         
         //工作年限
         var inputGZNX = document.getElementById("txt7")
         if(CheckIsEmpty(inputGZNX))
         {
            alert("工作年限不能为空！");
            inputGZNX.focus();
            return false;
         }
         //理财工作年限
         var inputLCGZNX = document.getElementById("txt8")
         if(CheckIsEmpty(inputLCGZNX))
         {
            alert("理财工作年限不能为空！");
            inputLCGZNX.focus();
            return false;
         }
         //客户关系占用时间
//         var inputKHTIME = document.getElementById("txt18")
//         if(CheckIsEmpty(inputKHTIME))
//         {
//            alert("客户关系占用时间不能为空！");
//            inputKHTIME.focus();
//            return false;
//         }
         //维护客户关系方式
//         var inputWHKHFS = document.getElementById("txt19")
//         if(CheckIsEmpty(inputWHKHFS))
//         {
//            alert("维护客户关系方式不能为空！");
//            inputWHKHFS.focus();
//            return false;
//         }
         //2007年度客户人数
         var inputKHRS2007 = document.getElementById("text221")
         if(CheckIsEmpty(inputKHRS2007))
         {
            alert("2007年度客户人数不能为空！");
            inputKHRS2007.focus();
            return false;
         }
         //2007年平均管理资产总量
         var inputAVGZCS2007 = document.getElementById("text222")
         if(CheckIsEmpty(inputAVGZCS2007))
         {
            alert("2007年平均管理资产总量不能为空！");
            inputAVGZCS2007.focus();
            return false;
         }
         //2007年金融产品销售量
         var inputCPXL2007 = document.getElementById("text223")
         if(CheckIsEmpty(inputCPXL2007))
         {
            alert("2007年金融产品销售量不能为空！");
            inputCPXL2007.focus();
            return false;
         }
         //2007单个客户的平均资产规模
         var inputDGZC2007 = document.getElementById("text224")
         if(CheckIsEmpty(inputDGZC2007))
         {
            alert("2007单个客户的平均资产规模不能为空！");
            inputDGZC2007.focus();
            return false;
         }
         
         //2008年度客户人数
         var inputKHRS2008 = document.getElementById("text221")
         if(CheckIsEmpty(inputKHRS2008))
         {
            alert("2008年度客户人数不能为空！");
            inputKHRS2008.focus();
            return false;
         }
         //2008年平均管理资产总量
         var inputAVGZCS2008 = document.getElementById("text232")
         if(CheckIsEmpty(inputAVGZCS2008))
         {
            alert("2008年平均管理资产总量不能为空！");
            inputAVGZCS2008.focus();
            return false;
         }
         //2008年金融产品销售量
         var inputCPXL2008 = document.getElementById("text233")
         if(CheckIsEmpty(inputCPXL2008))
         {
            alert("2008年金融产品销售量不能为空！");
            inputCPXL2008.focus();
            return false;
         }
         //2008单个客户的平均资产规模
         var inputDGZC2008 = document.getElementById("text234")
         if(CheckIsEmpty(inputDGZC2008))
         {
            alert("2008单个客户的平均资产规模不能为空！");
            inputDGZC2008.focus();
            return false;
         }
         
         //2009年度客户人数
         var inputKHRS2009 = document.getElementById("text241")
         if(CheckIsEmpty(inputKHRS2009))
         {
            alert("2009年度客户人数不能为空！");
            inputKHRS2009.focus();
            return false;
         }
         //2009年平均管理资产总量
         var inputAVGZCS2009 = document.getElementById("text242")
         if(CheckIsEmpty(inputAVGZCS2009))
         {
            alert("2009年平均管理资产总量不能为空！");
            inputAVGZCS2009.focus();
            return false;
         }
         
         //2009年金融产品销售量
         var inputCPXL2009 = document.getElementById("text243")
         if(CheckIsEmpty(inputCPXL2009))
         {
            alert("2009年金融产品销售量不能为空！");
            inputCPXL2009.focus();
            return false;
         }
         //2009单个客户的平均资产规模
         var inputDGZC2009 = document.getElementById("text244")
         if(CheckIsEmpty(inputDGZC2009))
         {
            alert("2009单个客户的平均资产规模不能为空！");
            inputDGZC2009.focus();
            return false;
         }
         //证明人姓名
         var inputZMREN = document.getElementById("zmren")
         if(CheckIsEmpty(inputZMREN))
         {
            alert("证明人姓名不能为空！");
            inputZMREN.focus();
            return false;
         }
         //证明人职业
         var inputZMRENZY = document.getElementById("zmzy")
         if(CheckIsEmpty(inputZMRENZY))
         {
            alert("证明人职业不能为空！");
            inputZMRENZY.focus();
            return false;
         }
         //证明人电话
         var inputzmtel = document.getElementById("zmtel")
         if(CheckIsEmpty(inputzmtel))
         {
            alert("证明人电话不能为空！");
            inputzmtel.focus();
            return false;
         }
        
         //验证选中了其他单选按钮，文本是否输入
          if(document.getElementById("chk6_8").checked)
          {
            var input15 = document.getElementById("i_hy");
            if(input15.value=="")
            {
                alert("您的单位属选择了其他，后面的文本框不能为空！");
                input15.focus();
                return false;
                
            }
          }
          
          if(document.getElementById("Radio3").checked)
          {
            var input18 = document.getElementById("lcjs");
            if(input18.value=="")
            {
                alert("理财工作中您主要担任的角色选择了其他，后面的文本框不能为空！");
                input18.focus();
                return false;
                
            }
          }
    
        //验证总和是否为100
        var sum=0;
        var text1 = document.getElementById("txt201").value;
        var text2 = document.getElementById("txt202").value;
        var text3 = document.getElementById("txt203").value;
        var text4 = document.getElementById("txt204").value;
        var text5 = document.getElementById("txt205").value;
        var text6 = document.getElementById("txt206").value;
        var text7 = document.getElementById("txt207").value;
      
        if(text1!=""||text2!=""||text3!=""||text4!=""||text5!=""||text6!=""||text7!="")
        {
            sum = parseInt(text1)+parseInt(text2)+parseInt(text3)+parseInt(text4)+parseInt(text5)+parseInt(text6)+parseInt(text7);
            if(sum!=100)
            {
                document.getElementById("txt201").focus();
                alert("您用于各理财领域的时间总和必须是：100");
                return false;
            }
        }
                
        var group = document.getElementsByName('rbl29');
        for(var i = 0; i< group.length; i++)
        {
         if(group.checked)
         {
          alert(group.value);
          return false;
          }
          }
            
//            if(document.getElementById("rbl29").value=="否")
//            {
//                alert("你还未同意郑重声明");
//                return false;
//            }
       // }
  }