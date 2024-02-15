import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-table',
  templateUrl: './table.component.html',
  styleUrls: ['./table.component.scss']
})
export class TableComponent {
  index!:number
  @Input() titre: string = "Name Table";
  @Input() data: { [key: string]: string | number }[] = [
    {
      id: 1,
      nom: "fadal",
      firstname: "ndiaye",
      age: 33,
      


    },
    {
      id: 2,
      nom: "nabou",
      firstname: "diop",
      age: 26,
      



    },
    {
      id: 3,
      nom: "babacar",
      firstname: "sy",
      age: 23,
      


    },

    {
      id: 1,
      nom: "fadal",
      firstname: "ndiaye",
      age: 33,
      
    


    },
    {
      id: 2,
      nom: "nabou",
      firstname: "diop",
      age: 26,
      
    

    },
    {
      id: 3,
      nom: "babacar",
      firstname: "sy",
      age: 23,
      
    

    },
    {
      id: 4,
      nom: "Mbengue",
      firstname: "Fatou",
      age: 23,
      
    

    },
    {
      id: 5,
      nom: "Aissatou",
      firstname: "diop",
      age: 23,
      
    

    }

  ];


  getHeadTableName(table: { [key: string]: string | number }[]): string[] {
    const fieldName: string[] = [];
    table.forEach(item => {
      Object.keys(item).forEach(key => {
        if (!fieldName.includes(key)) {
          fieldName.push(key);
        }
      })
    })
    return fieldName;
  }

  upOrDown: boolean = false;
  fieldName: string = ""

  up(field: string,i:number) {
    this.index = i;
    console.log(i);
    this.fieldName = field;
    this.upOrDown = true;
  }

  down(field: string,i:number) {
    this.index = i;
    console.log(i);
    this.fieldName = field;
    this.upOrDown = false;
  }


// buttonStates: { [key: string]: boolean } = {}; // Tableau pour stocker l'état de chaque bouton

// up(field: string, i: number) {
//   this.buttonStates ={};
//     this.index = i;
//     this.fieldName = field;
//     this.buttonStates[field] = true; // Stocker l'état du bouton dans le tableau
//     // Appeler la fonction de vérification
// }

// down(field: string, i: number) {
//     this.buttonStates = {};
//     this.index = i;
//     this.fieldName = field;
//     this.buttonStates[field] = false; // Stocker l'état du bouton dans le tableau
//     // Appeler la fonction de vérification
// }

}
