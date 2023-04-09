<!DOCTYPE html>
<html>
  <head>
    <title>Calculator</title>
    <style>
        * {
  box-sizing: border-box;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.calculator {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 500px;
  width: 400px;
  border-radius: 20px;
  background: linear-gradient(45deg, #4A148C, #7B1FA2, #9C27B0);
  box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
  font-size: 24px;
  color: #fff;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.display {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  height: 100px;
  width: 100%;
  padding: 0 20px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 20px 20px 0 0;
  box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.3);
}

.display input {
  height: 100%;
  width: 100%;
  border: none;
  outline: none;
  font-size: 48px;
  font-weight: bold;
  text-align: right;
  background: none;
  color: #fff;
}

.buttons {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 10px;
  padding: 20px;
  width: 100%;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 0 0 20px 20px;
  box-shadow: inset 0 -2px 5px rgba(0, 0, 0, 0.3);
}

button {
  height: 70px;
  border: none;
  outline: none;
  border-radius: 10px;
  background: rgba(255, 255, 255, 0.8);
  box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
  font-size: 28px;
  color: #333;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

button:hover {
  background: rgba(255, 255, 255, 0.9);
  box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3);
}

button:active {
  transform: translateY(2px);
  box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
}

button.operator {
  background: linear-gradient(45deg, #E65100, #FF5722);
  color: #fff;
}

button.operator:hover {
  background: linear-gradient(45deg, #FF5722, #E65100);
  color: #fff;
}

button.equal {
  background: linear-gradient(45deg, #00695C, #00897B, #009688);
  color: #fff;
}

button.equal:hover {
  background: linear-gradient(45deg, #009688, #00897B, #00695C);
  color: #fff;
}

button.clear {
  background: linear
  -gradient(45deg, #B71C1C, #F44336);
  color: #fff;
  }
  
  button.clear:hover {
  background: linear-gradient(45deg, #F44336, #B71C1C);
  color: #fff;
  }
  
  button.dot {
  font-size: 48px;
  }
  
  @media (max-width: 480px) {
  .calculator {
  height: 80vh;
  width: 90vw;
  font-size: 20px;
  }
  
  .display {
  height: 15%;
  }
  
  .buttons {
  height: 85%;
  padding: 10px;
  }
  
  button {
  font-size: 20px;
  height: 50px;
  }
  
  button.dot {
  font-size: 32px;
  }
}
    </style>
  </head>
  <body>
    <div class="calculator">
      <h1 align="center">Calculater</h1>
      <div class="display">
        <input type="text" id="input" placeholder="0" readonly>
      </div>
      <div class="buttons">
        <button value="C" class="btn">C</button>
        <button value="backspace" class="btn">⌫</button>
        <button value="/" class="btn">÷</button>
        <button value="*" class="btn">×</button>
        <button value="7" class="btn">7</button>
        <button value="8" class="btn">8</button>
        <button value="9" class="btn">9</button>
        <button value="-" class="btn">−</button>
        <button value="4" class="btn">4</button>
        <button value="5" class="btn">5</button>
        <button value="6" class="btn">6</button>
        <button value="+" class="btn">+</button>
        <button value="1" class="btn">1</button>
        <button value="2" class="btn">2</button>
        <button value="3" class="btn">3</button>
        <button value="." class="btn">.</button>
        <button value="0" class="btn">0</button>
        <button value="=" class="btn">=</button>
      </div>
    </div>  
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>  
    <script>
       $(document).ready(function() {
        let string ="";
        let arr=[];
        let arrJoin=[]; 
        let temp ="" ;
       let value = $('.btn');
            $.each( value, function( key, value ) {
                $(value).click(function(e){
                    if (e.target.value == '=') {
                        temp = arrJoin.join('');
                        arr.push(temp);
                        arrJoin=[];
                        temp ="" ;
                        string ="";

                        
                        // string = eval(string);
                        // $("#input").val(string); 
                        $.ajax({
                            type:"post",
                            url:"calculaterData.php",
                            data:{arr:arr},
                            success:function (data) {
                                $("#input").val();
                                $("#input").val(data);  
                            }
                        })
                    }else if(e.target.value == "+"|| e.target.value == "-" ||e.target.value == "*" ||e.target.value == "/"){
                        temp = arrJoin.join('');
                        arr.push(temp);
                        arr.push(e.target.value);
                        arrJoin=[];
                        temp ="" ;
                        string = string + e.target.value;
                        $("#input").val(string);
                    }
                    else if(e.target.value == 'C'){
                        string = "";
                       $("#input").val(string);
                    }  else if(e.target.value == 'backspace'){
                        string = $("#input").val();
                        string =  string.substr(0, string.length - 1);
                        $("#input").val(string);
                    }
                    else{
                        string = string + e.target.value;
                        $("#input").val(string);
                        arrJoin.push(parseInt(e.target.value));
                    }
                });
            });
       });

        
    </script>
  </body>
</html>