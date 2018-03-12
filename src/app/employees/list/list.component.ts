import { Employee } from './../models/employee';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.css']
})
export class ListComponent implements OnInit {
  employees: Employee[] = [
    {id : 1, firstName :'Jan', lastName : 'Kowalski', dateOfBirth : '01-01-1980', active : true, 
    details: {room: 1, position: 'manager'}},
    {id : 2, firstName :'Marcin', lastName : 'Benicewicz', dateOfBirth : '01-01-1985', active : false,
    details: {room: 2, position: 'vendor'}},
    {id : 3, firstName :'Jarek', lastName : 'Kopa', dateOfBirth : '01-010-1990', active : true,  
    details: {room: 3, position: 'CEO'}}
  ]
  constructor() { }
  test(): void {
    alert('Click');
    console.log('test');
  }
  ngOnInit() {
  }

}
