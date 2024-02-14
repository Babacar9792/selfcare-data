import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { UtilisateurRoutingModule } from './utilisateur-routing.module';
import { UtilisateurComponent } from './components/utilisateur/utilisateur.component';
import { SharedModule } from '../shared/shared.module';



@NgModule({
  declarations: [
    UtilisateurComponent
  ],
  imports: [
    CommonModule,
    UtilisateurRoutingModule,
    SharedModule
  ]
})
export class UtilisateurModule { }
