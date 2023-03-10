import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
<<<<<<< HEAD
import { HomeComponent } from './home/home.component';
=======
import { HeaderComponent } from './header/header.component';
>>>>>>> d7dcf94add9c5103bb5bc0b2d634df808ad0597c

@NgModule({
  declarations: [
    AppComponent,
<<<<<<< HEAD
    HomeComponent
=======
    HeaderComponent
>>>>>>> d7dcf94add9c5103bb5bc0b2d634df808ad0597c
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
