<?php
  $arr = $_POST["string"];
  $total; 
  foreach ($arr as $key => $data) {
    switch ($data) {
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
				$total = $data;
				break;
			}
		$total = calculation((int)$total, (int)$data, $type);
	}

}
echo $total;
  
  function calculation($a, $b, $type){
    switch ($type) {
      case 'add':
       return $a+$b;
	case 'subtract':
		return $a-$b;
	case 'multiply':
		return $a*$b;
		break;
	case 'divide':
		return $a/$b;
		break;
      default:
        return;
    }
  }


  ?>