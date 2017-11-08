$("#new_password").blur(function(){
              var num=$("#new_password").val().length;
              if(num<6){
                   alert('密码过短');              
              }
              else if(num>18){
                  alert('密码过长');                
              }
              else{
                  alert('格式正确');              
              }
          }) ;
$("#que_password").blur(function(){
              var tmp=$("#new_password").val();
              var num=$("#que_password").val().length;
              if($("#que_password").val()!=tmp){
                  alert('确认密码错误');                
              }
              else{
                  if(num>=6&&num<=18){
                                          
                  }                 
                  else{
                      alert('密码无效');                           
                  }                
              }
          });
