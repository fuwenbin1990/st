import ajax from '@/utils/http'

export function getlb(params){
	return ajax({
		url:'/php/getlb.php',
		method:'get',
		params
	})
}

export function postlb(data){
	return ajax({
		url:'/php/getlb.php',
		method:'post',
		data
	})
}

export function dellb(data){
	return ajax({
		url:'/php/getlb.php',
		method:'post',
		data
	})
}

export function postAdmin(data){
	return ajax({
		url:'/php/getlb.php',
		method:'post',
		data
	})
}