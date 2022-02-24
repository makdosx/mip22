#install packages


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


	echo -e "\n${GREEN}[${WHITE}+${GREEN}]${CYAN} Installing required packages..."

    if [[ -d "/data/data/com.termux/files/home" ]]; then
        if [[ `command -v proot` ]]; then
            printf ''
        else
			echo -e "\n${GREEN}[${WHITE}+${GREEN}]${MAGENTA} Installing package : ${CYAN}proot${CYANMAGENTA}"${WHITE}
            pkg install proot resolv-conf -y
        fi
    fi


	if [[ `command -v php` && `command -v wget` && `command -v curl` && `command -v unzip` ]]; then
		echo -e "\n${GREEN}[${WHITE}+${GREEN}]${GREEN} Mip packages already installed." 
		sleep 1
	
	else	
				echo -e "\n${GREEN}[${WHITE}+${GREEN}]${MAGENTA} Installing package : ${CYAN}$pkg${MAGENTA}"${WHITE}
				
				if [[ `command -v pkg` ]]; then
					pkg install figlet php curl wget unzip mpv -y
				
				elif [[ `command -v apt` ]]; then
					apt install figlet php curl wget unzip mpv -y
					
				elif [[ `command -v apt-get` ]]; then
					apt-get install figlet php curl wget unzip mpv -y
					
				elif [[ `command -v pacman` ]]; then
					sudo pacman -S figlet php curl wget unzip mpv --noconfirm
					
				elif [[ `command -v dnf` ]]; then
					sudo dnf -y install figlet php curl wget unzip mpv
					
				else
					echo -e "\n${RED}[${WHITE}!${RED}]${RED} Unsupported package manager, Install packages manually."
					{ sleep 2; exit 1; }
				fi
			
	fi
