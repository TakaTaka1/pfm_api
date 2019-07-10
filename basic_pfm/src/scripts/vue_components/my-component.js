
// vue instanceのプロパティを使いたい時はv-bind:props nameを使う
var MyComponent = {
	props:['title'],
	template:'<div>{{ title }}A custom component!</div>'
};