import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'sort'
})
export class SortPipe implements PipeTransform {

  transform(value: {[key:string]:string|number}[], key: string, ascending: boolean = true): {[key:string]:string|number}[] {
    if (!Array.isArray(value) || !key) {
      return value;
    }

    return value.sort((a, b) => {
      const valueA = a[key];
      const valueB = b[key];

      if (typeof valueA === 'string' && typeof valueB === 'string') {
        return ascending ? valueA.localeCompare(valueB) : valueB.localeCompare(valueA);
      } else {

        if (ascending) {
          return valueA < valueB ? -1 : valueA > valueB ? 1 : 0;
        } else {
          return valueB < valueA ? -1 : valueB > valueA ? 1 : 0;
        }
      }
    });
  }
}
