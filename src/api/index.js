import ajax from '@/utils/http'

export function roundShowImg(params){
	return ajax({
		url:'/php/st_roundShowImg.php',
		method:'get',
		params
	})
}