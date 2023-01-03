import { Directive, ElementRef, HostListener, Input } from '@angular/core';
type Shadow = [number, number, number, number];

@Directive({
  selector: '[appBorderCard]'
})
export class BorderCardDirective {
  
  private initColor: string = "black";
  private defaultChangeColor: string = "green";
  private initShadow: Shadow = [5,5,10,2];
  private defaultChangeShadow: Shadow = [5,5,20,2];
  private initBorder: number = 2;
  private defaultChangeBorder: number = 4;

  // @Input() appBorderCard: string|undefined;
  @Input("appBorderCard") borderColor: string|undefined;

  constructor(private el:ElementRef) 
  { 
    this.setShadow(...this.initShadow,this.initColor);
    this.setBorder(this.initBorder, this.initColor);
  }

  private setShadow(x:number, y:number, blur:number, radius:number, color:string)
  {
    this.el.nativeElement.style.boxShadow = `${x}px ${y}px ${blur}px ${radius}px ${color}`;
  }
  private setBorder(size:number, color:string)
  {
    this.el.nativeElement.style.border = `${size}px solid ${color}`;
  }

  @HostListener("mouseenter") onMouseEnter()
  {
    this.setBorder(this.defaultChangeBorder, this.borderColor || this.defaultChangeColor);
    this.setShadow(...this.defaultChangeShadow, this.borderColor || this.defaultChangeColor);
  }
  @HostListener("mouseleave") onMouseLeave()
  {
    this.setShadow(...this.initShadow,this.initColor);
    this.setBorder(this.initBorder, this.initColor);
  }
}
