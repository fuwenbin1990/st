import ajax from '@/utils/http'

export function allImgs(params){
	return ajax({
		url:'/php/index.php',
		method:'get',
		params
	})
}