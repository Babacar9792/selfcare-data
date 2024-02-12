import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { AuthService } from '../../services/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent {

  formAuthenticate : FormGroup = new FormGroup({});

  constructor(private fb : FormBuilder, private authService : AuthService){
    this.formAuthenticate = this.fb.group({
      username : ["", [Validators.required]],
      password : ["", [Validators.required]]
    })

  }

  get email(){
    return this.formAuthenticate.get('username');
  }
  get password(){
    return this.formAuthenticate.get('password');
  }

  login(){
    this.authService.login(this.formAuthenticate.value).subscribe({
      next : (value) => {
        console.log(value);
        
      },
      error : (err) =>{
        alert(err.message);
      }
    });
    
  }

}
