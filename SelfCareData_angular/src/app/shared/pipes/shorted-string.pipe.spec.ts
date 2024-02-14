import { ShortedStringPipe } from './shorted-string.pipe';

describe('ShortedStringPipe', () => {
  it('create an instance', () => {
    const pipe = new ShortedStringPipe();
    expect(pipe).toBeTruthy();
  });
});
