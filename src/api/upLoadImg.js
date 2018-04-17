import ajax from '@/utils/http'


export function upLoadImg(data){
	return ajax({
		url:'/php/upLoadImg.php',
		method:'post',
		data
	})
}