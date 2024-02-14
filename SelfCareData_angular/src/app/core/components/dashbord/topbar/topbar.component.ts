import { Component, EventEmitter, Input, Output, ViewChild } from '@angular/core';
import { SidebarComponent } from '../sidebar/sidebar.component';

@Component({
  selector: 'app-topbar',
  templateUrl: './topbar.component.html',
  styleUrls: ['./topbar.component.scss']
})
export class TopbarComponent {
 @Input() isSidebarVisible: boolean = true
 profilLink:boolean = false;
  @Output() toggleSidebar = new EventEmitter<void>();

  onToggleSidebar() {
    this.toggleSidebar.emit();
  }
  openProfilLink(){
    this.profilLink = !this.profilLink;
  }
}
