<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
      
.header{
  background: #80C683;
}
.header p{
  text-align: center;
  font-size: 16px;
  color: #fff;
  padding: 16px;
  margin: 0;
  font-weight: 700;
}
span{
  color: #fff;
  padding: 16px;
}
.padding-reset{
  padding-left: 0;
  padding-right: 0;
  /*use for resing default padding for .row in input text section*/
}
.teaxtbox input[type="text"]{
  width: 100%;
  border: 1px solid #f1f1f1;
  font-size: 18px;
  font-weight: 700;
  padding: 12px;
}
.teaxtbox input[type="text"]:focus{
  outline: none;
}
.commonbutton input[type="button"]{
  padding: 8px;
  background: #f2f2f2;
  border: none;
  font-size: 18px;
  font-weight: 700;
  width: 100%;
  margin-top: 15px;
  border-radius: 5px;
}
.conflict input[type="button"]{
  padding: 8px;
  background: #f2f2f2;
  border: none;
  font-size: 18px;
  font-weight: 700;
  width: 100%;
  margin-top: 15px;
  border-radius: 5px;
}
.conflict input[type="button"]:focus, .commonbutton input[type="button"]:focus{
  outline: none;
}
#del{
  background: #F40057;
  color: #fff;
}
#plus{
  height: 97px;
}
#equal{
  background: #80C683;
  color: #fff;
}

    </style>
  </head>
  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <!-- start of header section -->
          <div class="row header">
            <div class="col-md-2">
              <span class="glyphicon glyphicon glyphicon-menu-hamburger"></span>
            </div>
            <div class="col-md-8">
              <p>Calculator</p>
            </div>
            <div class="col-md-2">
              <span class="glyphicon glyphicon glyphicon-cog"></span>
            </div>
          </div> 
          <div class="row teaxtbox">
            <div class="col-md-12 padding-reset">
              <input type="text" value="" id="input">
            </div>
          </div>
          <!-- end of textbox -->

          <!-- start of button design -->
          <div class="row commonbutton">
            <!-- first row -->
            <div class="col-md-3">
              <input type="button" value="&#8730;" class="buttons">
            </div>
            <div class="col-md-3">
              <input type="button" value="(" class="buttons">
            </div>
            <div class="col-md-3">
              <input type="button" value=")" class="buttons">
            </div>
            <div class="col-md-3">
              <input type="button" value="%" class="buttons">
            </div>
            <!-- second row -->
            <div class="col-md-3">
              <input type="button" value="7" class="buttons">
            </div>
            <div class="col-md-3">
              <input type="button" value="8" class="buttons">
            </div>
            <div class="col-md-3">
              <input type="button" value="9" class="buttons">
            </div>
            <div class="col-md-3">
              <input type="button" value="/" class="buttons">
            </div>
            <!-- third row -->
            <div class="col-md-3">
              <input type="button" value="4" class="buttons">
            </div>
            <div class="col-md-3">
              <input type="button" value="5" class="buttons">
            </div>
            <div class="col-md-3">
              <input type="button" value="6" class="buttons">
            </div>
            <div class="col-md-3">
              <input type="button" value="*" class="buttons">
            </div>
            <!-- four row -->
            <div class="col-md-3">
              <input type="button" value="1" class="buttons">
            </div>
            <div class="col-md-3">
              <input type="button" value="2" class="buttons">
            </div>
            <div class="col-md-3">
              <input type="button" value="3" class="buttons">
            </div>
            <div class="col-md-3">
              <input type="button" value="-" class="buttons">
            </div>
           
          </div> <!-- end of comonbutton div -->
          <!-- end of button design -->
          <!-- start of conflicting button area -->
          <div class="row conflict">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-3">
                  <input type="button" value="0" class="buttons">
                </div>
                <div class="col-md-3">
              <input type="button" value="+" class="buttons">
            </div>
                <div class="col-md-3">
                  <input type="button" value="." class="buttons">
                </div>
                <div class="col-md-3">
                  <input type="button" value="Del" id="del" class="buttons">
                </div>
                <div class="col-md-12">
                  <input type="button" value="="  class="buttons" id="equal">
                </div>
              </div>
            </div> <!-- end  zero, dot, del and equal sign div -->
          </div> 
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
   
    <script>
      
      let string ="";
      let arr = [];
      let tmp = [];
      let element = "";
      let  buttons = document.querySelectorAll(".buttons");
       Array.from(buttons).forEach(button=> {
        button.addEventListener('click',(e)=>{
          if (e.target.value=='=') {
            // string =eval(string);
            // document.querySelector('#input').value = string;
            string =""
          }else if(e.target.value == "Del"){
              string ="";
              document.querySelector('#input').value = string;
          } else if(e.target.value == "+" || e.target.value == "-" || e.target.value == "*" || e.target.value == "/"){
            element = tmp.join('')
            arr.push(parseInt(element))
            arr.push(e.target.value)
            tmp = [];
            string = string + e.target.value;
            document.querySelector('#input').value = string;
          }else{
            string = string + e.target.value;
            tmp.push(parseInt(e.target.value));
            document.querySelector('#input').value = string;
          }
        })
       });
  $("#equal").click(function(e) {
    element = tmp.join('');
    arr.push(parseInt(element))
    tmp = [];
    element = "";
    e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "data.php",
                    data: {string:arr},
                    success: function(data) {
                     document.querySelector('#input').value = data;  
                    }
                });


            });


</script>
  </body>
</html>
