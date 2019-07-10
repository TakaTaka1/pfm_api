<?php
namespace Api\Validator;
$input_control=[
 "name"=>[
          "name"=>"氏名",
          "rule"=>"empty|max-50"
         ],
 "price"=>[
          "name"=>"価格",
          "rule"=>"empty|is_num"
         ],
];

$input_params=[
 "name"=>"attta",
 "price"=>"",
];

class ValidatorClass 
{
	public function validation ($input_control,$input_params) {
		$result = [];
		foreach($input_control as $attr_name => $info) {
			if(array_key_exists($attr_name, $input_params)){ // 属性チェック
				$input_value = $input_params[$attr_name];
				$rules = explode("|", $info["rule"]);
				foreach($rules as $rule){
					// $rule_arr = $this->parse_data($rule);
					$rule_arr = explode("-",$rule);
					$rule_name = $rule_arr[0];
					if(!empty($rule_arr[1])){
						$rule_setting = $rule_arr[1];
					}
					switch($rule_name) {
						case "empty":
							if($this->is_empty($input_value)) {
								$result[$attr_name][] = "{$info['name']}は必須です。";
							}
							break;
						case "is_num":
							if(!$this->is_valid_price($input_value)) {
								$result[$attr_name][] = "{$info['name']}は半角数値で入力してください。";
							}
							break;
						case "max":
							if(!empty($rule_setting) && $this->is_max($input_value,$rule_setting)) {
								$result[$attr_name][] = "{$info['name']}は{$rule_setting}以下で入力してください。";
							}
							break;
						case "email":
							if($this->is_valid_email($input_value)){
								$result[$attr_name][] = "{$info['name']}は正しいメール形式で入力してください。";
							}
							break;
					}
				}
			}
		}
		return $result;
	}
	public function parse_data($data=null) {
		return explode("-",$data);
	}

	public function is_empty ($value) {
		return empty($value);
	}

	public function is_valid_price ($value) {
		return is_numeric($value);
	}
    public function is_valid_image () {
    	// check extension
    }
    public function is_valid_email () {
    	// check email
    }
    public function is_max ($value) {
    	return strlen($value) > 50;
    }    
}
$tmp = new ValidatorClass();
print_r($tmp->validation($input_control,$input_params));