class Redirect{
    redirect(link){
        location.href = link;
    }
}

class Clock{
    show(){
        this.date = new Date();
        this.h = this.date.getHours();
        this.m = this.date.getMinutes();
        this.s = this.date.getSeconds();
        this.h = (this.h < 10) ? "0" + this.h : this.h;
        this.m = (this.m < 10) ? "0" + this.m : this.m;
        this.s = (this.s < 10) ? "0" + this.s : this.s;
        this.time = this.h + ":" + this.m + ":" + this.s;
        return this.time;
    }
}