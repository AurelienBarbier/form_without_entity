for file in '.deploy.sh'
do
    if [ -e "$file" ];
    then
       echo "$file must not be versionned."
     fi
done
