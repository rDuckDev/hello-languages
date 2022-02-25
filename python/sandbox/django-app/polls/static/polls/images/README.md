# Attribution

Original photo by *Mark Koch* on [Unsplash](https://unsplash.com/photos/KiRlN3jjVNU).

```cmd
REM HT: https://stackoverflow.com/questions/7261855/recommendation-for-compressing-jpg-files-with-imagemagick
REM optimize for web
magick mark-koch-KiRlN3jjVNU-unsplash.jpg -strip -interlace Plane -gaussian-blur 0.05 -sampling-factor 4:2:0 -quality 75% -interlace JPEG -colorspace sRGB -resize 1024x1024 background.jpg
```
