import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CoreRoutingModule } from './core-routing.module';
import { DashbordComponent } from './components/dashbord/dashbord.component';
import { SidebarComponent } from './components/dashbord/sidebar/sidebar.component';
import { TopbarComponent } from './components/dashbord/topbar/topbar.component';
import { AuthModule } from '../auth/auth.module';


@NgModule({
  declarations: [
    DashbordComponent,
    SidebarComponent,
    TopbarComponent,

  ],
  imports: [
    CommonModule,
    CoreRoutingModule,
    AuthModule
  ],
  exports : [
    DashbordComponent
  ]
})
export class CoreModule { }
