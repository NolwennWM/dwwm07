import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'typeColor'
})
export class TypeColorPipe implements PipeTransform {

  transform(type:string): string {
    let color:string="";
    switch(type)
    {
      case "dessert":
        color = "pink";
        break;
      case "plat":
        color = "brown";
        break;
      case "entrée":
        color = "green";
        break;
    }
    return color;
  }

}
