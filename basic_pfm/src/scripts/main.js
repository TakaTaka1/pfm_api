'use strict';

var price_data = new Vue({
	el:".area",
	data:{
		post_index:[],
		price:null,
		categorys:[],
		reciept_img:[],
		img_files:[],
		selected_files:[],
		uploaded_img:'',
		selected_category:'',
		load_page_flag:false,
		post_flag:false,
		post_history_flag:false,
		page_items:[],
		paid_history:[],	
	},
	methods:{
		// TODO axiosでPHP側にリクエストを投げる
		post_history: function(){
			var options = null;
			api_request_func.request_api(api_data.index,options,res=>{				
				if(res.data.message == 'Success'){
					
			    }
			    this.post_history_flag = true			    
				this.post_index.push(res.data.post_index)
			})			
		},
		chkPrice:function() {
		},
		file_change:function(e) {
			this.img_files = e.target.files || e.dataTransfer.files;
      		this.create_img(this.$refs.file.files[0]);      		
      		this.selected_files = this.$refs.file.files[0];
		},
		create_img:function(file) {
	      let reader = new FileReader();
	      reader.onload = (e) => {
	        this.uploaded_img = e.target.result;
	      };
	      reader.readAsDataURL(file);
		},
		fetchCategory: function() {
			this.categorys = [
					{
						"id":1,
						"detail":{
							"name":"category1",
							"date":20190101
						}
					},
					{
						"id":2,
						"detail":{
							"name":"category2",
							"date":20190101
						}
					},
					{
						"id":3,
						"detail":{
							"name":"category3",
							"date":20190101
						}
					},
					{
						"id":4,
						"detail":{
							"name":"category4",
							"date":20190101
						}
					},
								
			]			
		},
		chkCategory: function() {			
		},
		postData: function() {
			if(this.price == null || this.selected_files.length == 0 || this.selected_category == null){
				var error_message = '';
				if(this.price == null){
					error_message += '・Enter Price<br>';
				}
				if(this.selected_files.length == 0){
					error_message += '・Set File<br>';
				}
				if(!this.selected_category){
					error_message += '・Set Category';
				}												
				Swal.fire(error_message,'','error')
				return;
			}
			let formData = new FormData();
            formData.set('price',this.price);
            formData.append('file', this.selected_files);
            formData.set('date',this.postTime());
            formData.set('category_id',this.selected_category);
			var options = {price:this.price,category_id:this.selected_category,date:this.postTime(),img:formData};
			api_request_func.request_api(api_data.post,formData,res=>{
				// if(res.data.message == 'Success'){
				// 	Swal.fire('Saved','','success')
			 //    }			
				this.post_flag = true;
				this.paid_history.push(res.data.paid_history)
			})									
		},
		postTime : function () {		    
			return moment(new Date).format('YYYY/MM/DD HH:mm:ss')
		},
		fetchPage: function () {
			// var options = {
			// 	page: self.total_pfm_data.selected_page+1
			// }
			// api_request_func.request_api(api_data.loadpage,options,res =>{
			// 	res.data.page.forEach(page => {
						   
			// 	})
			// 	this.load_page_flag = true				
			// 	console.log(api_request_func.page_items.page)
			// 	this.page_items = api_request_func.page_items.page
			// })					
		}				
	},
	computed:{
		enteredPrice: function(){
			return this.price
		}
	},
	components: {
		'my-component':MyComponent,
	}	
})

window.onload = function(){
	price_data.fetchCategory()
	price_data.post_history()	
} 

window.onscroll = function(){
  if(document.body.offsetHeight - window.innerHeight - window.scrollY == 0){  	 
  	  price_data.fetchPage();		  	  
  }  
};
