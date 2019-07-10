'use strict';
// axios.defaults.baseURL = 'http://localhost:8090';
axios.defaults.baseURL = 'https://pfm.enjoenjoyengineer.com';

var http_method = {
	get:'GET',
	post:'POST',
};

var api_data = {
	index     : {url: "/",     method: http_method.get},
	post      : {url: "/post/edit",     method: http_method.post},
	loadpagmae: {url: "/loadpage", method: http_method.get},
	category  : {url: "/category", method: http_method.get},	
}

// axiosのサーバーへのリクエスト処理を共通化 
var api_request_func = {
	request_api : function (api_param){

		var success_response = null
		var url_path = arguments.length > 1 && arguments[0] !== undefined ? arguments[0] : null;
		var data = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
		var callback = arguments.length > 1 && arguments[2] !== undefined ? arguments[2] : null;
		var options = {
			method: url_path.method,
			url: axios.defaults.baseURL + url_path.url,
			responseType:'json',
			data:data
		}
		if(url_path.method == 'POST'){
			options.headers = {'Content-Type':'text/plain;charset=utf-8,multipart/form-data,'}
		}
		axios(options).then((response) => {		
			if(response.data.success){
				success_response = response				
			}				
		}).catch(error => {
			console.log(error)	
		}).finally(() =>{
			success_response = this.check_api_status(success_response,data)
			if(callback != null && typeof callback == 'function') {
				// 呼び出し元にパラメータを渡せる
				callback(success_response)
			}
		});						
	},
	check_api_status: function(success_response,data){
		// TODO 
		return success_response		
	},
}