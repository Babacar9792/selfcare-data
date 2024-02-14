import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpClientModule } from '@angular/common/http'

import { SharedRoutingModule } from './shared-routing.module';
import { ReactiveFormsModule } from '@angular/forms';
import { TableComponent } from './components/table/table.component';
import { PaginationComponent } from './components/pagination/pagination.component';
import { SortPipe } from './pipes/sort.pipe';
import { ShortedStringPipe } from './pipes/shorted-string.pipe';


@NgModule({
  declarations: [
    TableComponent,
    PaginationComponent,
    SortPipe,
    ShortedStringPipe
  ],
  imports: [
    CommonModule,
    SharedRoutingModule,
    HttpClientModule,
    ReactiveFormsModule
  ]
  ,
  exports : [
    HttpClientModule,
    ReactiveFormsModule,
    TableComponent,
    PaginationComponent
  ]
})
export class SharedModule { }
