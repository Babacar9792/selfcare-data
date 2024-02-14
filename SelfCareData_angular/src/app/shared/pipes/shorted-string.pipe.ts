import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'shortedString'
})
export class ShortedStringPipe implements PipeTransform {

  transform(value: string, limit : number = 5): string {
    if(value.length > limit){
      value = value.substring(0, limit)+"...";
    }
    return value;
  }

}
