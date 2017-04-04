In this post, I share some personal experience with computing an desktop Linux, and provide info for anyone interested in getting started. You can jump to [the installation info](#steps) if you'd rather not read my background.

## Why Desktop Linux?

I'm not sure exactly what it was that lured me to becoming a desktop Linux user, but if I was asked to remember, it likely had something to do with free (as in beer) software for photo, video, and audio creation. I've been playing guitar for years. Growing up in rural Nebraska, I didn't have many friends just to get together and make music. Within the span of about a month, I went from over-dubbing crude recordings from a dual cassette deck to using my first DAW.[^1]

## Dabbling
When looking for free non-linear video editing software, you'll likely either come up dry, or stumble upon a bunch of open-source projects maintained by various dark corners of the Linux community - at least that was the case when I was last seriously looking. I had been using GIMP for photo editing, Open Broadcaster Software for recording screen captures or other sources, and editing video with Blender. Luckily, all of this wonderful software was available for me to use on Windows, but I wasn't happy with Windows after experiencing some WIFI driver issues soon after purchasing a laptop... (sound familiar?). I use that example often when my Microsoft brand-loyal buddies jab me about drivers and hardware compatibility. I first installed Linux (Crunchbang) to use my laptop practically, and efficiently. WIFI just worked! ...But my track pad didn't. _Welcome to the world of hacking at a terminal, kid._ To be fair, I probably would have felt much more comfortable installing Ubuntu (which I was told to hate but ironically use now) or Linux Mint (which I used once and __do__ hate).

However frustrating my first encounter with desktop Linux was, it made me realize there is so much more to the world of computing than I had long been accustomed to, and my curiosity about it kept me coming back. This went on for a while until I decided to make the leap. Windows 8-point-whatever introduced the worst desktop environment I had ever used. This was the only time in my life I felt a user interface was seriously standing in the way of my productivity. 

## Diving In
I had recently written a batch of songs I had partially arranged and tracked with Windows when I decided I was going to take the leap and go 100% Linux for my audio production. I knew there were tools available for audio production with Linux, but I hadn't used them much, so naturally, I did some research this time. The consensus at the time was to either use AVLinux or KXStudio. I believe both to be fantastic projects, but ultimately installed KXStudio 14.04.[^2] I was amazed with how much robust software was packed into this distribution and instantly fell in love.

I now use Ubuntu (Ubuntu-GNOME, Ubuntu-MATE) for everything I do, and I still use KXStudio repos on my audio production computer. I even RDP into my Windows work computer daily from my GNOME desktop. It allows me the flexibility to switch workspaces and use all the tools I've grown fond of working with. I created a handy video a year ago with the release of Ubuntu 16.04 LTS that details the steps to setting up a computer for audio production. Although watching it now, I still find some things to cringe about, overall, it's a pretty decent guide to getting a stable desktop system installed that can act as your production workhorse.

## Before You Go
I've included the video here so you can check it out, along with some setup instructions below as referenced in the video. If you decide to take this journey, I can guarantee it won't always be pretty, but damn-it, you might just find a new love for computing and a fresh way to go about creating music. I proudly present you with Wesley's...

## Linux Audio Production Setup | 2016 Edition {#steps}

<div class="videoWrapper"><iframe width="560" height="315" src="https://www.youtube.com/embed/S5LNm33BC_I" frameborder="0" allowfullscreen></iframe></div>

## Steps to Get Started with Linux & KXStudio Repos:

1. Choose your flavor or Ubuntu. Here are the most common(in order of my preference for audio production):
  * [Ubuntu-GNOME](https://ubuntugnome.org/download/)
  * [Ubuntu-MATE](https://ubuntu-mate.org/download/)
  * [Xubuntu](https://xubuntu.org/getxubuntu/)
  * [Kubuntu](http://www.kubuntu.org/getkubuntu/)
  * [Ubuntu](https://www.ubuntu.com/download/desktop)

2. Write the downloaded ISO file to USB
  * [Rufus](https://rufus.akeo.ie/) seems popular for Windows
  * Mac and Linux users can do the following from the terminal:

### Mac OS
~~~ .sh
diskutil list           ##note disks and insert USB stick.
diskutil list           ##note id for USB stick just inserted. IMPORTANT
diskutil unmountDisk /dev/diskX     ##replace X as necessary.
sudo dd if=/path/to/file.iso of=/dev/rdiskX bs=1m ##again, replace as needed.
~~~ 

### Linux
~~~ .sh
sudo fdisk -l           ##note the usb name by size "sdX"
umount /dev/sdX         ##replace X as necessary.
sudo dd if=/path/to/file.iso of=/dev/sdX bs=1m ##again, replace as needed.
~~~ 

3. Boot from USB. You may need to access your PC's BIOS to enable legacy boot and set boot drive priority. Once booted, Install Ubuntu!

4. Restart and remove installation USB.

5. Configure your system for audio production and install KXStudio Repos. Open a terminal (ctrl + alt + t) and follow [this link](http://kxstudio.linuxaudio.org/Repositories). Run each of the commands on this page in your terminal. (middle mouse click is your best friend for copying and pasting to your terminal)

6. Next, you'll need to install the actual software and do some system configuration. Here's what that typically looks like. Your mileage may vary.[^3]

~~~ .sh
### Add yourself to the audio group ###
sudo adduser [yourusername] audio

### update apt cache ###
sudo apt update

### install some software packages ###
sudo apt install kxstudio-default-settings kxstudio-meta-audio pulseaudio-module-jack

### install low latency kernel ###
sudo apt install linux-lowlatency

### reboot! ###
sudo reboot
~~~

7. Once you've rebooted, open up the program called __Cadence__ and check to see if the jack server is running. Check out the tail-end of my video for some more info about Cadence.

Feel free to shoot me a comment on the YouTube video page. I enjoy getting involved in any way I can.


[^1]: I still use FL Studio under Wine. It works pretty well!

[^2]: This was back when the iso itself was still on an LTS Ubuntu version. Special thanks to FalkTX for maintaining such a wonderful project for the Linux audio production community. 

[^3]: If you're installing Linux on your computer for audio production, keep in mind, things may break and you may have to read a little bit to solve issues. If you'd like video and graphics creation software along with the audio meta-package, run 'sudo apt install kxstudio-meta-all' in your terminal.
