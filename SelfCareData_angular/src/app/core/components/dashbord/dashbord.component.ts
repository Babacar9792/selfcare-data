import { Component, EventEmitter, OnInit, Output } from '@angular/core';
import { AuthService } from 'src/app/auth/services/auth.service';

@Component({
  selector: 'app-dashbord',
  templateUrl: './dashbord.component.html',
  styleUrls: ['./dashbord.component.scss']
})
export class DashbordComponent {

  isSidebarVisible = true;
  isAuthenticate: boolean = true;
  constructor(private authService: AuthService) {
    // console.log(this.authService.getUser());
    this.isAuthenticate = this.authService.isAuthenticate();
  }

  toggleSidebar() {
    this.isSidebarVisible = !this.isSidebarVisible;
  }

}
