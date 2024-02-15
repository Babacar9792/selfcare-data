import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { UtilisateurComponent } from './components/utilisateur/utilisateur.component';
import { authGuard } from '../helpers/guards/auth.guard';

const routes: Routes = [
  {
    path: '',component:UtilisateurComponent, canActivate : [authGuard]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class UtilisateurRoutingModule { }
