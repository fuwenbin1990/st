// import Vue from "vue" 
import axios from "axios"


// Vue.prototype.$http = axios


let service = axios.create({
	baseURL:process.env.BASE_API,
	timeout:5000,
})

export default service