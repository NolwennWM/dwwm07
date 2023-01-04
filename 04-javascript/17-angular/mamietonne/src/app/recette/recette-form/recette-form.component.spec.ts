import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RecetteFormComponent } from './recette-form.component';

describe('RecetteFormComponent', () => {
  let component: RecetteFormComponent;
  let fixture: ComponentFixture<RecetteFormComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ RecetteFormComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RecetteFormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
