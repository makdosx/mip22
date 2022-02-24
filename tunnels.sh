#!/bin/bash


#
#  Copyright (c) 2022 Barchampas Gerasimos <makindosxx@gmail.com>.
#  mip22 is a advanced phishing tool.
#
#  mip22 is free software: you can redistribute it and/or modify
#  it under the terms of the GNU Affero General Public License as published by
#  the Free Software Foundation, either version 3 of the License, or
#  (at your option) any later version.
#
#  mip22 is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU Affero General Public License for more details.
#
#  You should have received a copy of the GNU Affero General Public License
#  along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
#



# Terminal Colors

RED="$(printf '\033[31m')"  
GREEN="$(printf '\033[32m')"  
ORANGE="$(printf '\033[33m')"  
BLUE="$(printf '\033[34m')"
MAGENTA="$(printf '\033[35m')"  
CYAN="$(printf '\033[36m')"  
WHITE="$(printf '\033[37m')" 
BLACK="$(printf '\033[30m')"


echo -e "\n${GREEN}[${WHITE}+${GREEN}]${CYAN} Installing required tunnels."


# Ngrok Download
get_ngrok() {
	
	url="$1"
	file=`basename $url`
	
	if [[ -e "$file" ]]; then
		rm -rf "$file"
	fi
	
	wget --no-check-certificate "$url" > /dev/null 2>&1
	
	if [[ -e "$file" ]]; then
		unzip "$file" > /dev/null 2>&1
		mv -f ngrok .host/ngrok > /dev/null 2>&1
		rm -rf "$file" > /dev/null 2>&1
		chmod +x .host/ngrok > /dev/null 2>&1
		
	else
		echo -e "\n${RED}[${WHITE}!${RED}]${RED} Error, Install Ngrok manually."
		{ clear; exit 1; }
	fi
}


# Cloudflared Download
get_cloudflared() {
	
	url="$1"
	file=`basename $url`
	if [[ -e "$file" ]]; then
	
		rm -rf "$file"
	fi
	
	wget --no-check-certificate "$url" > /dev/null 2>&1
	
	if [[ -e "$file" ]]; then
		mv -f "$file" .host/cloudflared > /dev/null 2>&1
		chmod +x .host/cloudflared > /dev/null 2>&1
		
	else
		echo -e "\n${RED}[${WHITE}!${RED}]${RED} Error, Install Cloudflared manually."
		{ clear; exit 1; }
	fi
}




# Download and install Ngrok

ngrok_download_and_install() {

	if [[ -e ".host/ngrok" ]]; then
		echo -e "\n${GREEN}[${WHITE}+${GREEN}]${GREEN} Ngrok already installed. Setup your api from menu."
		sleep 1
	
	else
	
		echo -e "\n${GREEN}[${WHITE}+${GREEN}]${MAGENTA} Downloading and Installing ngrok..."${WHITE}
		
		architecture=$(uname -m) 
		
		if [[ ("$architecture" == *'arm'*) || ("$architecture" == *'Android'*) ]]; then
			get_ngrok 'https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-arm.zip'
			
		elif [[ "$architecture" == *'aarch64'* ]]; then
			get_ngrok 'https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-arm64.zip'
			
		elif [[ "$architecture" == *'x86_64'* ]]; then
			get_ngrok 'https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-amd64.zip'
			
		else
			get_ngrok 'https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-386.zip'
		fi
	fi

}




# Download and install Cloudflared 

cloudflared_download_and_install() {
	
	if [[ -e ".host/cloudflared" ]]; then
		echo -e "\n${GREEN}[${WHITE}+${GREEN}]${GREEN} Cloudflared already installed."
		sleep 1
	
	else
	
		echo -e "\n${GREEN}[${WHITE}+${GREEN}]${MAGENTA} Downloading and Installing Cloudflared..."${WHITE}
		
		architecture=$(uname -m)
		
		if [[ ("$architecture" == *'arm'*) || ("$architecture" == *'Android'*) ]]; then
			get_cloudflared 'https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-arm'
		
		elif [[ "$architecture" == *'aarch64'* ]]; then
			get_cloudflared 'https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-arm64'
		
		elif [[ "$architecture" == *'x86_64'* ]]; then
			get_cloudflared 'https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-amd64'
		
		else
			get_cloudflared 'https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-386'
		fi
	fi

}





# Download and install Localhostrun

localhostrun_download_and_install() {
	if [[ `command -v ssh -R 80:localhost:8080 nokey@localhost.run` ]]; then
		echo -e "\n${GREEN}[${WHITE}+${GREEN}]${GREEN} LocalhostRun already installed."
		sleep 1
	
	else
	
		echo -e "\n${GREEN}[${WHITE}+${GREEN}]${MAGENTA} Downloading and Installing LocalhostRun..."${WHITE}
		
		ssh -R 80:localhost:8080 nokey@localhost.run
	fi 	
   
}




ngrok_download_and_install
cloudflared_download_and_install
localhostrun_download_and_install
