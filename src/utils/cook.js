import cook from 'js-cookie' 

export function setCook(name,value,time){
	cook.set(name,value,{expires:time,path:'/'})
};

export function getCook(name){
	return cook.get(name)
};

export function delCook(name){
	cook.remove(name,{path:'/'})
};