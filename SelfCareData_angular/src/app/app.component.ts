import { Component } from '@angular/core';
import { FormGroup } from '@angular/forms';
import { environment } from 'src/environments/environment.development';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = environment.appName;

  form : FormGroup = new FormGroup({});
}
