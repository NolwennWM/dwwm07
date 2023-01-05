import { TestBed } from '@angular/core/testing';

import { MemoryDataService } from './memory-data.service';

describe('MemoryDataService', () => {
  let service: MemoryDataService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(MemoryDataService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
