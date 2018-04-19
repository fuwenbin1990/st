import ajax from '@/utils/http'

export function allImgs(params){
	return ajax({
		url:'/php/index.php',
		method:'get',
		params
	})
}

export function text(params){
	return ajax({
		url:'/php/index.php',
		method:'get',
		params
	})
}