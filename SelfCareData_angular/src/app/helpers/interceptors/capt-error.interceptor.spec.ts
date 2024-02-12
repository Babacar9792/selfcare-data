import { TestBed } from '@angular/core/testing';

import { CaptErrorInterceptor } from './capt-error.interceptor';

describe('CaptErrorInterceptor', () => {
  beforeEach(() => TestBed.configureTestingModule({
    providers: [
      CaptErrorInterceptor
      ]
  }));

  it('should be created', () => {
    const interceptor: CaptErrorInterceptor = TestBed.inject(CaptErrorInterceptor);
    expect(interceptor).toBeTruthy();
  });
});
