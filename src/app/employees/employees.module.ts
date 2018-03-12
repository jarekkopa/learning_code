import { MyNewPipePipe } from './../my-new-pipe.pipe';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListComponent } from './list/list.component';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [ListComponent, MyNewPipePipe],
  exports: [ListComponent]
})
export class EmployeesModule { }
