import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateRecetteComponent } from './create-recette.component';

describe('CreateRecetteComponent', () => {
  let component: CreateRecetteComponent;
  let fixture: ComponentFixture<CreateRecetteComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CreateRecetteComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CreateRecetteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
