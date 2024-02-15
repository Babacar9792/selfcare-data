import { Injectable } from '@angular/core';
import { ParentService } from 'src/app/shared/services/parent.service';
import { environment } from 'src/environments/environment.development';
import { Login } from '../interfaces/login';
import { ResponseData } from '../interfaces/response-data';
import { Observable } from 'rxjs';
import { User } from 'src/app/shared/interfaces/user';

@Injectable({
  providedIn: 'root'
})
export class AuthService extends ParentService {

  uriLogin: string = "login";
  uriLogout: string = "logout";

  login<T>(credential: Login): Observable<ResponseData<T>> {
    return this.postData<Login, ResponseData<T>>(this.uriLogin, credential);
  }

  logout<R>(): Observable<R> {
    return this.getData<R>(this.uriLogout);

  }

  isAuthenticate(): boolean {
    return localStorage.getItem(environment.appName + "_token") != null;
  }

  getToken(): string {
    if (this.isAuthenticate()) {
      return localStorage.getItem(environment.appName + "_token")!
    }
    return "";
  }

  getUser() {
    let user: User = JSON.parse(localStorage.getItem(environment.appName + 'user')!);
    return user;
  }

}
