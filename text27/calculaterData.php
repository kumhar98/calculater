<?php 
 $arr = $_POST['arr'];
 $total;
 $type="";
foreach ($arr as $key => $value) {
    switch ($value) {
       case '+':
           $type = "add";
           break;
       case '-':
            $type = "subtract";
            break;
       case '*':
           $type = "multiply";
           break;            
       case '/':
           $type = "divide";
           break; 
       default:
       if (empty($total)) {
          $total = $value;
          break;
       }  
             $total = add($type,(int)$value,(int)$total);
          
    }
}
echo $total;
function add($type,$data,$total){
  switch ($type) {
    case 'add':
       return $total + $data;
        break;
    case 'subtract':
      return $total - $data;
         break;
     case 'multiply':
        return $total * $data;
        break;
     case 'divide':
        return  $total/$data;
   
        break;
    default:
        return;
        break;
  }

}



?>