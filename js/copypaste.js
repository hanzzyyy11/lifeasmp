function copyIP(){

const ip = "lifeasmp.my.id:25565";

navigator.clipboard.writeText(ip);

const notify = document.getElementById("copyNotify");

notify.classList.add("show");

setTimeout(()=>{
notify.classList.remove("show");
},2000);

}