for file in '.idea'
do
    if [ -e "$file" ];
    then
       echo "$file must not be versionned."
     fi
done
