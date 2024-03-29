import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable, tap } from 'rxjs';
import { environment } from 'src/environments/environment.development';

@Injectable({
  providedIn: 'root'
})
export class ParentService {

  private url: string = environment.url.api;

  constructor(public http: HttpClient) { }

  get gethttp() {
    return this.http;
  }

  getData<T>(uri: string): Observable<T> {
    return this.http.get<T>(this.url + uri).pipe(
      tap(value => {
        console.log(value);
      })
    );
  }

  postData<E, R>(uri: string, data: E): Observable<R> {
    return this.http.post<R>(this.url + uri, data).pipe(
      tap(value => console.log(value)
      )
    );
  }

  putData<E, R>(uri: string, data: E): Observable<R> {
    return this.http.put<R>(this.url + uri, data).pipe(
      tap(value => console.log(value)
      )
    );
  }

  deleteData<E, R>(uri : string, data : E) : Observable<R>{
    return this.http.delete<R>(this.url+uri, {
      body : data
    });

  }
}
