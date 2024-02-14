import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: "auth", loadChildren :()=> import('./auth/auth.module').then(m => m.AuthModule)
  },
  {
    path: "utilisateur", loadChildren :()=> import('./utilisateur/utilisateur.module').then(m =>m.UtilisateurModule) //
  },
  {
    path : "**", redirectTo : 'utilisateur'
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
