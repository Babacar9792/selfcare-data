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
      prenom: "ndiaye",
      age: 33,
      email: "cvbgj,nkm%Lkjhgfhjbkl",
      numero: "kljhgfhjklmjhgfdhj",
      adresse: "fghjklmjfdgjklmjfdg",
      test1: 3,
      test2: "tfghb jdsqhbkhljkmlshvfkvbsdjbjpkbhjgksdjsfbk",
      test3 : "qdsjhgkljm",
      test4 : 'sdfguhijoklm',
      test6 : "fcygvuhbijnk,l;",
      test7 : "stxycguvhibjnk",
      test8 : "tfcygvuhbijokpl",
      test9 : "fcygv",
      test10 : "111111"

    },
    {
      id: 2,
      nom: "nabou",
      prenom: "diop",
      age: 26,
      email: "cvbgj,nkm%Lkjhgfhjbkl",
      numero: "kljhgfhjklmjhgfdhj",
      adresse: "fghjklmjfdgjklmjfdg",
      test1: 3,
      test2: "tfghb jdsqhbkhljkmlshvfkvbsdjbjpkbhjgksdjsfbk",
      test3 : "qdsjhgkljm",
      test4 : 'sdfguhijoklm',
      test6 : "fcygvuhbijnk,l;",
      test7 : "stxycguvhibjnk",
      test8 : "tfcygvuhbijokpl",
      test9 : "",
      test10 : "111111"

    },
    {
      id: 3,
      nom: "babacar",
      prenom: "sy",
      age: 23,
      email: "cvbgj,nkm%Lkjhgfhjbkl",
      numero: "kljhgfhjklmjhgfdhj",
      adresse: "fghjklmjfdgjklmjfdg",
      test1: 3,
      test2: "tfghb jdsqhbkhljkmlshvfkvbsdjbjpkbhjgksdjsfbk",
      test3 : "qdsjhgkljm",
      test4 : 'sdfguhijoklm',
      test6 : "fcygvuhbijnk,l;",
      test7 : "stxycguvhibjnk",
      test8 : "tfcygvuhbijokpl",
      test9 : "",
      test10 : "111111"

    },

    {
      id: 1,
      nom: "fadal",
      prenom: "ndiaye",
      age: 33,
      email: "cvbgj,nkm%Lkjhgfhjbkl",
      numero: "kljhgfhjklmjhgfdhj",
      adresse: "fghjklmjfdgjklmjfdg",
      test1: 3,
      test2: "tfghb jdsqhbkhljkmlshvfkvbsdjbjpkbhjgksdjsfbk",
      test3 : "qdsjhgkljm",
      test4 : 'sdfguhijoklm',
      test6 : "fcygvuhbijnk,l;",
      test7 : "stxycguvhibjnk",
      test8 : "tfcygvuhbijokpl",
      test9 : "",
      test10 : "111111"


    },
    {
      id: 2,
      nom: "nabou",
      prenom: "diop",
      age: 26,
      email: "cvbgj,nkm%Lkjhgfhjbkl",
      numero: "kljhgfhjklmjhgfdhj",
      adresse: "fghjklmjfdgjklmjfdg",
      test1: 3,
      test2: "tfghb jdsqhbkhljkmlshvfkvbsdjbjpkbhjgksdjsfbk",
      test3 : "qdsjhgkljm",
      test4 : 'sdfguhijoklm',
      test6 : "fcygvuhbijnk,l;",
      test7 : "stxycguvhibjnk",
      test8 : "tfcygvuhbijokpl",
      test9 : "",
      test10 : "111111"

    },
    {
      id: 3,
      nom: "babacar",
      prenom: "sy",
      age: 23,
      email: "cvbgj,nkm%Lkjhgfhjbkl",
      numero: "kljhgfhjklmjhgfdhj",
      adresse: "fghjklmjfdgjklmjfdg",
      test1: 3,
      test2: "tfghb jdsqhbkhljkmlshvfkvbsdjbjpkbhjgksdjsfbk",
      test3 : "qdsjhgkljm",
      test4 : 'sdfguhijoklm',
      test6 : "fcygvuhbijnk,l;",
      test7 : "stxycguvhibjnk",
      test8 : "tfcygvuhbijokpl",
      test9 : "",
      test10 : "111111"

    },
    {
      id: 4,
      nom: "Mbengue",
      prenom: "Fatou",
      age: 23,
      email: "cvbgj,nkm%Lkjhgfhjbkl",
      numero: "kljhgfhjklmjhgfdhj",
      adresse: "fghjklmjfdgjklmjfdg",
      test1: 3,
      test2: "tfghb jdsqhbkhljkmlshvfkvbsdjbjpkbhjgksdjsfbk",
      test3 : "qdsjhgkljm",
      test4 : 'sdfguhijoklm',
      test6 : "fcygvuhbijnk,l;",
      test7 : "stxycguvhibjnk",
      test8 : "tfcygvuhbijokpl",
      test9 : "",
      test10 : "111111"

    },
    {
      id: 5,
      nom: "Aissatou",
      prenom: "diop",
      age: 23,
      email: "cvbgj,nkm%Lkjhgfhjbkl",
      numero: "kljhgfhjklmjhgfdhj",
      adresse: "fghjklmjfdgjklmjfdg",
      test1: 3,
      test2: "tfghb jdsqhbkhljkmlshvfkvbsdjbjpkbhjgksdjsfbk",
      test3 : "qdsjhgkljm",
      test4 : 'sdfguhijoklm',
      test6 : "fcygvuhbijnk,l;",
      test7 : "stxycguvhibjnk",
      test8 : "tfcygvuhbijokpl",
      test9 : "",
      test10 : "111111"

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
