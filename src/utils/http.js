// import Vue from "vue" 
import axios from "axios"
import qs from "qs"


// Vue.prototype.$http = axios


let service = axios.create({
	baseURL:process.env.BASE_API,
	timeout:5000,
})

service.interceptors.request.use(function(config){
	if(config.method == "post"){
		config.data = qs.stringify(config.data);
		return config
	}else{
		return config
	}
})
export default service