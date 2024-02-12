import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { CoreModule } from './core/core.module';
import { CaptErrorInterceptor } from './helpers/interceptors/capt-error.interceptor';
import { HTTP_INTERCEPTORS } from '@angular/common/http';

@NgModule({
  declarations: [
    AppComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    CoreModule
    ],
  providers: [
    {
      provide: HTTP_INTERCEPTORS,
      multi : true,
      useClass : CaptErrorInterceptor
    }
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
