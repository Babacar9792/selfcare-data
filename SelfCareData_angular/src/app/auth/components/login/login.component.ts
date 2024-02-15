import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { AuthService } from '../../services/auth.service';
import { UserLogin } from '../../interfaces/user-login';
import { environment } from 'src/environments/environment.development';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent {

  formAuthenticate : FormGroup = new FormGroup({});

  constructor(private fb : FormBuilder, private authService : AuthService, private router : Router){
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
    this.authService.login<UserLogin>(this.formAuthenticate.value).subscribe({
      next : (value) => {
        if(value.status){
          localStorage.setItem(environment.appName+"_token", value.data.token);
          localStorage.setItem(environment.appName+'_user', JSON.stringify(value.data.user));
          this.router.navigateByUrl('egztgf');
          
        }
        else{
          alert(value.message);
        }
      },
      error : (err) =>{
        alert(err.message);
      }
    });
    
  }

}
